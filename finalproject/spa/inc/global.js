var mysql = require("mysql");

module.exports =  {
    GetConnection: function(){
        var conn = mysql.createConnection({
          host: "localhost",
          user: "root",
          password: "1234",
          database: "c9"
        });
    return conn;
}
};
