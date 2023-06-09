<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @auth
        <div class="flex flex-row items-center justify-between px-4 bg-slate-300 mb-5">
            <p><strong>{{Auth::user()->name}}</strong>, are logged in!</p>
            <form action="/logout" method="post" class="mb-0">
                @csrf
                <button class="rounded-full p-2 px-6 bg-slate-700 text-white my-2 hover:bg-slate-800">Logout</button>
            </form>
        </div>

        <div class="container mx-auto grid md:grid-cols-12 gap-4 px-4">
            <div class="md:col-span-4">
                <h2 class="text-3xl mb-4">Create a new post</h2>
                <form action="/create-post" method="post" class="flex flex-col justify-start">
                    @csrf
                    <input type="text" name="title" placeholder="Post title" class="p-3 rounded-md my-2 border-2">
                    <textarea name="body" placeholder="Enter the content" rows="4" class="p-3 rounded-md my-2 border-2"></textarea>
                    <div>
                        <button class="rounded-full p-2 px-6 bg-slate-700 text-white my-2 hover:bg-slate-800">Save Post</button>
                    </div>
                </form>
            </div>
            <div class="feed md:col-span-8">
                <div>
                    <h2 class="text-3xl mb-4">Your Posts</h2>
                    {{-- @foreach($posts as $post)
                                               
                    @endforeach --}}
                    @forelse ($posts as $post)
                        <div class="bg-gray-100 py-8 px-6 rounded-md mb-10 relative">
                            <h3 class="text-2xl mb-4 max-w-_90">{{$post['title']}}  <small class="text-gray-400">by {{$post->user->name}}</small></h3>
                            <div>{{$post['body']}}</div>
                            <div class="flex flex-row justify-between w-28 absolute top-0 right-0 p-4 text-sm">
                                <p><a href="/edit-post/{{$post->id}}" class="text-gray-400 hover:text-gray-600">Edit</a></p>
                                <form action="/delete-post/{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-200 hover:text-red-500">Delete</button>
                                </form>
                            </div>
                        </div> 
                    @empty
                        <div class="p-4 rounded-md bg-red-100 text-black">
                            <p>There are currently no posts. Please try creating one.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-row justify-center items-center space-x-4 min-h-screen bg-slate-300 h-full">
            <div class="flex space-x-3">
                <div class="flex flex-col mx-auto border-2 border-slate-500 rounded-md py-5 px-6">
                    <h2 class="text-2xl mb-2">Register</h2>
                    <form action="/register" method="post" class="flex flex-col">
                        @csrf
                        <input type="text" name="name" placeholder="name" class="p-3 rounded-md my-2">
                        <input type="text" name="email" placeholder="email" class="p-3 rounded-md my-2">
                        <input type="password" name="password" placeholder="password" class="p-3 rounded-md my-2">
                        <button class="rounded-full p-2 bg-slate-700 text-white my-2 hover:bg-slate-800">Register</button>
                    </form>
                </div>
    
                <div class="flex flex-col mx-auto border-2 border-slate-500 rounded-md py-5 px-6">
                    <h2 class="text-2xl mb-2">Login</h2>
                    <form action="/login" method="post" class="flex flex-col">
                        @csrf
                        <input type="text" name="loginname" placeholder="name" class="p-3 rounded-md my-2">
                        <input type="password" name="loginpassword" placeholder="password" class="p-3 rounded-md my-2">
                        <button class="rounded-full p-2 bg-slate-700 text-white my-2 hover:bg-slate-800">Login</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</body>

</html>