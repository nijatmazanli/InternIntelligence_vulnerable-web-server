const express = require('express');
const multer = require('multer');
const path = require('path');
const { exec } = require('child_process');
const pug = require('pug');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();
const port = 8000;

// Set up storage engine
const storage = multer.diskStorage({
  destination: './uploads/',
  filename: function (req, file, cb) {
    var fileNameWithoutExt = path.parse(file.originalname).name;
    //fileNameWithoutExt = fileNameWithoutExt.replace(/\s+/g, '_');
    cb(null, fileNameWithoutExt);
console.log(fileNameWithoutExt);
  }
});

// Initialize upload
const upload = multer({
  storage: storage,
  fileFilter: function (req, file, cb) {
    checkFileType(file, cb);
  }
}).single('file');

// Check file type
function checkFileType(file, cb) {
  // Allowed ext
  const filetypes = /jpeg|jpg|png|gif/;
  // Check ext
  const extname = filetypes.test(path.extname(file.originalname).toLowerCase());

  if (extname) {
    return cb(null, true);
  } else {
    cb('Error: Images Only!');
  }
}

// Route to upload file
app.set("view engine","pug");
app.get('/', (req, res) => {
  const userInput = req.query.name;
  console.log(userInput);
res.send("Sasa");
});



app.post('//', (req, res) => {
	console.log("Sdaa");
  upload(req, res, (err) => {
    if (err) {
      res.send(err);
    } else {
      if (req.file == undefined) {
        res.send('No file selected!');
      } else {
        const filePath = path.join(__dirname, 'uploads', req.file.filename);
console.log(filePath);

        // Change file permissions using terminal commands
	exec(`cat ${filePath}`, (err, stdout, stderr) => {
          if (err) {
		console.log("Wqwqwqwqwqwqwqwq");
           // res.send(`File uploaded: ${req.file.filename}, but failed to change permissions: ${err.message}`);
          } else {
           console.log("dsdsdsdsd");
//res.send(`File uploaded: ${req.file.filename}, Path: ${filePath}, Permissions changed successfully`);
          }
        });
        exec(`chmod 777 ${filePath} && cp ${filePath} /var/www/shadowstore.com/public_html/uploads/`, (err, stdout, stderr) => {
          if (err) {
            res.send(`File uploaded: ${req.file.filename}, but failed to change permissions: ${err.message}`);
          } else {
            res.send(`File uploaded: ${req.file.filename}, Path: ${filePath} , Permissions changed successfully`);
          }
        });
      }
    }
  });
});

app.listen(port, () => console.log(`Server started on port ${port}`));
