<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Real Time APP">
        <meta name="author" content="Salamon Andor">

        <title>Real Time APP</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>

    <div id="app">
        <users></users>
    </div>

    <template id="users-template">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Creation Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td>@{{ user.id }}</td>
                <td>@{{ user.name }}</td>
                <td>@{{ user.email }}</td>
                <td>@{{ user.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </template>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
        Vue.component('users', {
            template: '#users-template',
            data: function () {
                return {
                    users: []
                }
            },
            created: function () {
                this.getUsers();
            },
            methods: {
                getUsers: function () {
                    $.getJSON("{{ route('api_users') }}", function (users) {
                        this.users = users;
                    }.bind(this));
                    setTimeout(this.getUsers, 1000);
                }
            }
        });
        new Vue ({
            el: '#app'
        });
    </script>
    </body>
</html>
