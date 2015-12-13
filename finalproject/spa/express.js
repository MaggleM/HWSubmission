var express = require('express'),
    app = express();
var bodyParser = require('body-parser');
var session = require('express-session');

var person = require("./Model/person");
var food = require("./Model/food");
var workout = require("./Model/workout");
var keywords = require("./Model/keywords");
var unirest = require('unirest');
var Twit = require('twit');

var twit = new Twit({
    consumer_key:         'f3ouqfUhHYYQXeKUeOYCRNhWh'
  , consumer_secret:      '4XFrJI5EnJE9i8impd6qJoU07qpzqiol8KQxzrHL6F8jcE0gDO'
  , access_token:         '283364595-Y1IsKjp9rPwRgk0dTKHe7cfoKUoX084t0qs1Cy6h'
  , access_token_secret:  'S3olUNiCHRRRBVA3WCDkLy9TM5SEMdOLMTq05qwR7IMuG'
})

app.use(express.static(__dirname + '/public'));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(session({ secret: 'Happy Chanukkah' }));

app.get("/person", function(req, res){
  
  person.get(null, function(err, rows){
    res.send(rows);
  })
    
})
.get("/person/:id", function(req, res){
  
  person.get(req.params.id, function(err, rows){
    res.send(rows[0]);
  })
  
})
.post("/person", function(req, res){
  var errors = person.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  person.save(req.body, function(err, row){
      if(err){
        res.status(500).send(err);
        return;
      }
    res.redirect("/person/" + row.id);
  })
})
.delete("/person/:id", function(req, res){
  
  person.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
  
})

.get("/keywords", function(req, res){
  keywords.get(null, function(err, rows){
    res.send(rows);
  })
})

.get("/food", function(req, res){
  food.get(null, req.session.user.id, function(err, rows){
    res.send(rows);
  })
})
.get("/food/:id", function(req, res){
  food.get(req.params.id, req.session.user.id,  function(err, rows){
    res.send(rows[0]);
  })
})
.get("/food/search/:term", function(req, res){
    unirest.get("https://nutritionix-api.p.mashape.com/v1_1/search/" + req.params.term + "?fields=item_name%2Citem_id%2Cbrand_name%2Cnf_calories%2Cnf_total_fat")
    .header("X-Mashape-Key", "QxyXJv64zNmshKT4iSlxif0Zm86Rp1boHAhjsna42sYYQXPKI4")
    .header("Accept", "application/json")
    .end(function (result) {
        res.send(result.body);
    });
    
})
.post("/food", function(req, res){
  var errors = food.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  req.body.UserId = req.session.user.id
  food.save(req.body, function(err, row){
      if(err){
        res.status(500).send(err);
        return;
      }
    res.redirect("/food/" + row.id);
  })
})
.delete("/food/:id", function(req, res){
  food.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
})


.get("/workout", function(req, res){
  workout.get(null, req.session.user.id, function(err, rows){
    res.send(rows);
  })
})
.get("/workout/:id", function(req, res){
  workout.get(req.params.id, req.session.user.id, function(err, rows){
    res.send(rows[0]);
  })
})
.post("/workout", function(req, res){
  var errors = workout.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  
  twit.post('statuses/update', { status: 'I just worked out for ' + req.body.duration + ' at ' + req.body.Name }, function(err, data, response) {
      console.log(data)
    })
  
  req.body.UserId = req.session.user.id;
  workout.save(req.body, function(err, row){
      if(err){
        res.status(500).send(err);
        return;
      }
    res.redirect("/workout/" + row.id);
  })
})
.delete("/workout/:id", function(req, res){
  workout.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
})
.post("/login", function(req, res){
    unirest.get("https://graph.facebook.com/me?access_token=" + req.body.access_token + "&fields=id,name,email")
    .end(function (result) {
        var fbUser = req.session.fbUser = JSON.parse(result.body);
        fbUser.access_token = req.body.access_token;
        person.get(fbUser.id, function(err, rows) {
            if(rows && rows.length){
                req.session.user = rows[0];
            }else{
                person.save({ Name: fbUser.name, fbid: fbUser.id, Birthday: '2015-01-01', TypeId: 6 }, function(err, row) {
                    req.session.user = row;
                })
            }
           res.send(result.body);
        }, 'facebook');
    });
})
.get("/fbUser", function(req, res){
    res.send(req.session.fbUser);
})
.get("/user", function(req, res){
    res.send(req.session.user);
});




app.listen(process.env.PORT);
