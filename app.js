const express = require("express");
const app = express();

app.use((req, res, next) => {
  res.status(200).json({
    message: "Restfull nodejs dan express",
  });
});

module.exports = app;
