import axios from 'axios'

window.axios = axios
//temporário
window.axios.defaults.headers.common['Authorization'] = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1MzMzMjY4NTYsImV4cCI6MTUzMzMzMDQ1NiwidXNlciI6eyJpZCI6IjIiLCJuYW1lIjoiWXVyaSIsImVtYWlsIjoieXVyaUB1c2VyLmNvbSIsImNyZWF0ZWQiOm51bGwsIm1vZGlmaWVkIjpudWxsfX0.zLzc6YJlxV9Ii-QUBMAcLqv8ZCIDI2oZifiV5Do1qxU'