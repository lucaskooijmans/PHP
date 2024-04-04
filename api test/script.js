fetch('http://php.test/api/user/ads', {
    method: 'GET',
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer 1|IHltM6kjpCllRhnIN6L4uKqC4FnVLvGkhiXAA8ME7ae65744'
    }
})
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));