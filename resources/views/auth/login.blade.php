<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <!-- <div class="ball_mask absolute w-16 h-16 bg-neutral-600 rounded-[50%]"></div> -->
    <div class="container-login py-10 px-24 h-screen flex items-center justify-center">
        <div
            class="wrapper-login  h-fit rounded-[1rem] bg-white-300 bg-clip-padding backdrop-filter bg-neutral-100 backdrop-blur-md bg-opacity-60 ">
            <div class="img_login flex items-center lg:h-full w-full p-10">
                <div class="hero_section md:hidden max-sm:hidden lg:flex flex-col h-full">

                    {{-- <img class="img_hero relative object-cover rounded-[1rem] w-[32rem] h-full" src="{{'assets/Food illustration.jpeg'}}" alt=""> --}}

                </div>
                <div class="login_form rounded-[1rem]">
                    <div class="form w-full flex flex-col gap-6 ">
                        <div class="title_login flex flex-col gap-2 h-full">
                            <h1 class="text-3xl font-bold">Sign In.</h1>
                            <p class="text-lg font-light text-neutral-500 leading-7">Please Sign In before access
                                Dashboard!</p>
                        </div>
                        <form action='{{ route('login.auth') }}' method="POST" class="input_form flex flex-col gap-6">
                            @csrf
                            <div class="email flex flex-col gap-2">
                                <label for="username" class="username_label ">Username</label>
                                <input type="text" placeholder="" id="username" name="username"
                                    class="username px-4 py-3 bg-neutral-100 border-2 border-neutral-200 rounded-[8px] outline-none">
                            </div>
                            <div class="password flex flex-col gap-2">
                                <label for="password" class="password_label">Password</label>
                                <input type="text" placeholder="" id="password" name="password"
                                    class="password  bg-neutral-100 px-4 py-3 border-2 border-neutral-200 rounded-[8px] outline-none">
                            </div>
                            <button type="submit" name="submit"
                                class="login_submit w-full bg-purple-500 hover:bg-purple-600 font-semibold text-white py-4 rounded-[8px]">Sign
                                In to account</button>
                        </form>
                    </div>
                    <p class="text-center text-[14px] mt-6">By sign an account you agree with our <span
                            class="underline">Terms of Service</span>,<br> <span class="underline">Privacy
                            Policy</span>, and my default <span class="underline">Notification Settings.</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
