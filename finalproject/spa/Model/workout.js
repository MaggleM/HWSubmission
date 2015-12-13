var g = require("../inc/global");
var userId = 4;

module.exports =  {
    blank: function(){ return {} },
    get: function(id, userId, ret){
        var conn = g.GetConnection();
        var sql = 'SELECT E.*, K.Name as TypeName, P.Name as PersonName FROM Fitness_Workout_Done E '
                + '   Join Fitness_Persons P ON E.UserId = P.id '
                + '   Join Fitness_Keywords K ON E.TypeId = K.id '
                + ' WHERE E.UserId = ' + userId;
        if(id){
          sql += " AND E.id = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = g.GetConnection();
        conn.query("DELETE FROM Fitness_Workout_Done WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = g.GetConnection();
        //  TODO Sanitize
        if (row.id) {
				  sql = " Update Fitness_Workout_Done "
							+ " Set `TypeId`=?, `UserId`=?, `Name`=?, `Time`=?, `Duration`=?, `Intensity`=? "
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO `Fitness_Workout_Done` (`created_at`, `TypeId`, `UserId`, `Name`, `Time`, `Duration`, `Intensity`) "
						  + "VALUES (Now(), ?, ?, ?, ?, ?, ? ) ";				
			  }

        conn.query(sql, [row.TypeId, row.UserId, row.Name, row.Time, row.Duration, row.Intensity, row.id],function(err,data){
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

