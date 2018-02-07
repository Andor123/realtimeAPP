<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Real Time APP">
        <meta name="author" content="Salamon Andor">

        <title>Real Time APP</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
