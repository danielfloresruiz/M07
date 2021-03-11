$('document').ready(function(){
    var todo = [];
    fetch("https://jsonplaceholder.typicode.com/users")
    .then(data => data.json())
    .then(tot =>{
        tots = tot;
        tots.map((todo,i) => {
            let table = document.querySelector('#mainTable tbody')

            let tr = document.createElement('tr');

            let name = document.createElement('td');
            let email = document.createElement('td');
            let complet = document.createElement('td');
            let completButton = document.createElement('button');
            completButton.innerHTML = 'Ver';
            completButton.addEventListener('click',function() {
                alert(
                    'ID: '+todo.id +
                    '\nNom: '+todo.name +
                    '\nUsername: '+todo.username +
                    '\nAddress:'+
                    '\n     Street: '+todo.address.street +
                    '\n     Suite: '+todo.address.suite +
                    '\n     City: '+todo.address.city +
                    '\n     Zipcode: '+todo.address.zipcode +
                    '\n     Geo: '+
                    '\n         Lat: '+todo.address.geo.lat +
                    '\n         Lng: '+todo.address.geo.lng +
                    '\nPhone: '+todo.phone +
                    '\nWebsite: '+todo.website +
                    '\nCompany: '+
                    '\n     Name: '+todo.company.name +
                    '\n     CatchPhrase: '+todo.company.catchPhrase +
                    '\n     Bs: '+todo.company.bs
                )
            })
            let all = document.createElement('td');
            let allButton = document.createElement('button');
            allButton.innerHTML = 'Ver';
            allButton.addEventListener('click',function() {
                window.open("https://jsonplaceholder.typicode.com/todos?userId="+todo.id);
            })

            let posts = document.createElement('td');
            let postButton = document.createElement('button');
            postButton.innerHTML = 'Post';
            postButton.addEventListener('click',function() {
                window.open("https://jsonplaceholder.typicode.com/posts?userId="+todo.id);
            })

            name.innerHTML = todo.name;
            email.innerHTML = todo.email;
            //posts.innerHTML = "<a href=http://"+todo.website +">Link</a>";

            table.appendChild(tr);
            tr.appendChild(name);
            tr.appendChild(email);

            tr.appendChild(complet);
            complet.appendChild(completButton);

            tr.appendChild(all);
            all.appendChild(allButton);

            tr.appendChild(posts);
            posts.appendChild(postButton);
        })
    })
})