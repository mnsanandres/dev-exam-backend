const express = require('express')
const { DateTime } = require('luxon')

const app = express()
const port = 3000


app.get('/', (req, res) => {
  res.json({
    dateTime: DateTime.now().toFormat('yyyy-MM-dd HH:mm:ss')
  })
})

app.listen(port, () => {
  console.log(`Backend API listening at http://localhost:${port}`)
})