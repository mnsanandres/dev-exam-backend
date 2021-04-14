const express = require('express')
const cors = require('cors')
const { DateTime } = require('luxon')

const app = express()
const port = 3000

app.use(cors())

app.get('/', (req, res) => {
  res.json({
    date_time: DateTime.now().toFormat('yyyy-MM-dd HH:mm:ss')
  })
})

app.listen(port, () => {
  console.log(`Backend API listening at http://localhost:${port}`)
})