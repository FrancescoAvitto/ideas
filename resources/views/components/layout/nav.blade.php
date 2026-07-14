<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Idea Logo" width="50"/>
            </a>
        </div>

        <div class="flex items-center gap-x-5">

            @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn">Log Out</button>
                </form>
            @endauth

            @guest
            
            <a href="/login"> Sign in</a>
            <a href="/register" class="btn">Register</a>
            @endguest
        </div>

    </div>

</nav>