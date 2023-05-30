const express = require('express')
const EventEmitter = require('events')
const cors = require('cors')
const app = express()

const emitter = new EventEmitter()

app.use(cors());
app.use(express.json())


app.get('/sse', (req, res) => {
    res.writeHead(200, {
        'Connection': 'keep-alive',
        'Content-Type': 'text/event-stream'
    })

    const onMessage = msg => res.write(`data: ${msg}\n\n`)
    emitter.on('message', onMessage)

    res.on('close', () => {
        emitter.off('message', onMessage)
    })
})

app.post('/send', (req, res) => {
    emitter.emit('message', JSON.stringify(req.body))
    // console.log(req.body)
    res.end()
})

app.listen(8080, () => console.log('server is listening'))