<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')

    <label for="name">名前</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label for="email">メールアドレス</label>
    <input type="email" name="email" value="{{ $user->email }}" required>

    <button type="submit">保存</button>
</form>