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
    <div class="container-login h-screen flex items-center justify-center">
        <div class="wrapper-login flex w-[24rem] gap-6 flex-col items-center">
            <div class="side flex flex-col gap-2 text-black justify-between ">
                <h1 class="text-[2rem] text-center font-bold leading-[3rem]">Hola, welcome back!</h1>
                <p class="text-sm text-center font-extralight">Lorem ipsum dolor sit amet, consetetur
                    sadipscing elitr, sed diam nonumy eirmod tempor invidunt .</p>
            </div>
            <span class="w-full h-[1px] rounded-full bg-slate-300"></span>
            <div class="form-container w-full">
                <form action='{{ route('login.auth') }}' method="POST" class="input_form flex flex-col gap-6">
                    @csrf
                    <div class="email flex flex-col gap-2">
                        <label for="username" class="username ">Username</label>
                        <input placeholder="Enter your name" type="text" placeholder="" id="username" name="username"
                            class="user px-4 py-2 bg-neutral-100 border-2 border-neutral-200 rounded-[8px] outline-none">
                    </div>
                    <div class="password flex flex-col gap-2">
                        <label for="password" class="password_label">Password</label>
                        <input placeholder="Enter password with min 8 chars" type="password" placeholder="" id="password" name="password"
                            class="password  bg-neutral-100 px-4 py-2 border-2 border-neutral-200 rounded-[8px] outline-none">
                    </div>
                    <button type="submit" name="submit"
                        class="login_submit w-full bg-gray-900 hover:bg-gray-950 font-semibold text-white py-3 rounded-[8px]">Sign
                        In to account</button>
                </form>

            </div>

        </div>
    </div>
</body>

</html>
