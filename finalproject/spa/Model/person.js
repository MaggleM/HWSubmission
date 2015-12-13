var g = require("../inc/global");

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret, searchType){
        var conn = g.GetConnection();
        var sql = 'SELECT P.*, K.Name as TypeName FROM Fitness_Persons P Join Fitness_Keywords K ON P.TypeId = K.id ';
        if(id){
          switch (searchType) {
            case 'facebook':
              sql += " WHERE P.fbid = " + id;
              break;
            
            default:
              sql += " WHERE P.id = " + id;
          }
          
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = g.GetConnection();
        conn.query("DELETE FROM Fitness_Persons WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = g.GetConnection();
        
        
        if (row.id) {
				  sql = " Update Fitness_Persons "
							+ " Set Name=?, Birthday=?, TypeId=?, fbid=? "
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO Fitness_Persons "
						  + " (Name, Birthday, created_at, TypeId, fbid) "
						  + "VALUES (?, ?, Now(), ?, ? ) ";				
			  }

        conn.query(sql, [row.Name, row.Birthday, row.TypeId, row.fbid, row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.Name) errors.Name = "is required"; 
      
      return errors.length ? errors : false;
    }
};
