<!DOCTYPE html>
<html>
    <head>
        <title>
            Apple Store
        </title>
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="flex justify-center">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-16" method="POST" action="{{ route('postLogin') }}">
                	@csrf

                <h5 class="block text-gray-700 uppercase font-bold text-center mb-2">Admin Login</h5>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" placeholder="Enter email" type="email" required="">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" placeholder="******************" type="password" required="">
                            <p class="text-red-500 text-xs italic">
                                Please choose a password.
                            </p>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                            Sign In
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>