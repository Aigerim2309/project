function leviy(r){
	fetch('pets.php',{
    method : 'post',
    headers: new Headers({
      'Content-Type': 'application/json',  // sent request
      'Accept':       'application/json'   // expected data sent back
    }),
    body: JSON.stringify({
        'action': r,
    	'pet': document.getElementById('pet').value,
    	'age': document.getElementById('age').value,
    	'url': document.getElementById('url').value,
    })
 }).then(function(response) {
            if (response.status >= 200 && response.status < 300) {
                console.log(response.text())
            }
            throw new Error(response.statusText)
        })
        .then(function(response) {
            console.log(response);
        })

}

function create(){
    leviy('create');
}


function update(){
    leviy("update");
}

function del(){
    leviy("delete");
}
