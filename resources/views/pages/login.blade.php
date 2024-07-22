@extends('layout.main')

@section('the_content')
<div class='shadow container py-5'>
    <h1>Entra in piattaforma</h1>
    <form class="d-flex flex-column" method="POST" id="loginForm">
        @csrf()
        <label>
            Il tuo username
            <input id="loginForm__email" class="form-control me-2 my-1" name="email" type="email" placeholder="mario.rossi@email.it" required>
        </label>
        <label>
            La tua password
            <input id="loginForm__password" class="form-control me-2 my-1" name="password" type="password" required>
        </label>
        <span id="loginForm__response"></span>
        <button class="btn btn-outline-success" type="submit">Entra!</button>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    var LoginForm = document.getElementById('loginForm');
    LoginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var LoginForm__Email = document.getElementById('loginForm__email');
        var LoginForm__Password = document.getElementById( 'loginForm__password' );
        var LoginForm__Response = document.getElementById( 'loginForm__response' );
        var LoginResponse = fetch( "{{ route('api.login') }} ", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                "email": LoginForm__Email.value,
                "password": LoginForm__Password.value,
                "isAjax" : true
            })
        })
        .then( (response) => response.json() ) 
        .then( (response) => {
            setTimeout( function() {
                window.location.href = '/';
            }, 3500 );
            if( response.success ) {
                document.cookie = 'tempId=' + response.data.user;
                sessionStorage.setItem( 'auth-token', response.data.access_token );
            }
            LoginForm__Response.innerHTML = '';
            LoginForm__Response.innerHTML = response.message;
        })
        .finally( () => console.log( 'Finito la fetch'));
    });
</script>
@endsection