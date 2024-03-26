<x-header/>
<h1>{{$user->name}}</h1>
@if($user->tokens->count() > 0)
    <label for="api_key">API Key</label>
    <input type="text" for="api_key" disabled name="api_key" value="{{$user->tokens->first->token->token}}">
@else
    <form method="POST" action="{{route('token.create')}}">
        @csrf
        <label for="api_key">API Key</label>
        <input type="hidden" for="user_id" name="token_name" value="{{$user->id}}">
        <input type="text" for="api_key" disabled name="api_key">
        <button type="submit">Create Token</button>
        @endif
</form>
</body>
<x-footer/>
</html>