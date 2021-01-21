<style>
    * {
        font-family: sans-serif;
    }
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
        background-color:#3F51B5;
        color:#FFF;
    }
</style>
<div class="container">
    <h2>Bem vindo, {{ $user->name }}</h2>
    <br>
</div>