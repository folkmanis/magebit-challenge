@extends('layout.default')

@section('content')
<div class="container flex flex-col md:flex-row flex-wrap my-6 font-bold lg:mt-8 text-3xl">
    <h1 class="text-gray-900 page-title title-font">
        <span class="base" data-ui-id="page-title-wrapper">
            Customer Login
        </span>
    </h1>
    @if(session('status'))
    <div>
        {{ session('status') }}
    </div>
    @endif

</div>

<div class="columns">
    <div class="column main">
        <div id="customer-login-container" class="login-container">
            <div class="w-full md:w-1/2 card mr-4">
                <div aria-labelledby="block-customer-login-heading">
                    <form class="form form-login" action="{{ url('login') }}" method="post" id="customer-login-form">
                        @csrf
                        @error('email')
                        <div>
                            {{ $message }}
                        </div>
                        @enderror
                        <fieldset class="fieldset login">
                            <legend class="mb-3">
                                <h2 class="text-xl font-medium title-font text-primary">
                                    Login
                                </h2>
                            </legend>
                            <div class="text-secondary-darker mb-8">
                                If you have an account, sign in with your email address.
                            </div>
                            <div class="field">
                                <label class="label" for="email">
                                    <span>Email</span>
                                </label>
                                <div class="control">
                                    <input data-test="login-email" name="email" class="form-input" required="" value="" autocomplete="off" id="email" type="email" title="Email">
                                </div>
                            </div>
                            <div class="field">
                                <label for="pass" class="label">
                                    <span>Password</span>
                                </label>
                                <div class="control flex items-center">
                                    <input data-test="login-password" name="password" class="form-input" required="" autocomplete="off" id="pass" title="Password" type="password">
                                    <div class="cursor-pointer px-4" aria-label="Show Password">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" width="24" height="24">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="actions-toolbar flex justify-between pt-6 pb-2 items-center">
                                <button data-test="login-submit" type="submit" class="btn btn-primary disabled:opacity-75" name="send">
                                    <span>Sign In</span>
                                </button>
                                <a class="underline text-secondary" href="#">
                                    <span>Forgot Your Password?</span>
                                </a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="card w-full md:w-1/2 my-8 md:my-0">
                <div>
                    <h2 class="text-xl font-medium title-font mb-3 text-primary" role="heading" aria-level="2">
                        New Customers
                    </h2>
                </div>
                <form class="form form-create-user" method="post" id="customer-register-form" action="{{ url('register') }}">
                    @csrf
                    <fieldset class="fieldset create">
                        <legend class="mb-3">
                            <h3 class="text-xl font-medium title-font text-primary">
                                Personal Information
                            </h3>
                        </legend>

                        <!-- First Name -->
                        <div class="field">
                            <label class="label" for="registerFirstName">
                                <span>First Name</span>
                            </label>
                            <div class="control">
                                <input type="text" data-test="register-firstName" name="firstname" class="form-input" id="registerFirstName" title="First Name" value="{{ old('firstname') }}" />
                            </div>
                            <div class=" field field-reserved field-error">
                                @error('firstname')
                                <ul class="messages">
                                    <li class="">
                                        {{ $message }}
                                    </li>
                                </ul>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="field">
                            <label class="label" for="registerLastName">
                                <span>Last Name</span>
                            </label>
                            <div class="control">
                                <input type="text" data-test="register-lastName" name="lastname" class="form-input" id="registerLastName" title="Last Name" value="{{ old('lastname') }}" />
                            </div>
                            <div class="field field-reserved field-error">
                                @error('lastname')
                                <ul class="messages">
                                    <li class="">
                                        {{ $message }}
                                    </li>
                                </ul>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="mb-3">
                            <h3 class="text-xl font-medium title-font text-primary">
                                Sign-In Information
                            </h3>
                        </legend>

                        <!-- Email -->
                        <div class="field">
                            <label class="label" for="registerEmail">
                                <span>Email</span>
                            </label>
                            <div class="control">
                                <input type="email" data-test="register-email" name="email" class="form-input" id="registerEmail" title="Email" value="{{ old('email') }}" />
                            </div>
                            <div class="field field-reserved field-error">
                                @error('email')
                                <ul class="messages">
                                    <li class="">
                                        {{ $message }}
                                    </li>
                                </ul>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="field">
                            <label class="label" for="registerPassword">
                                <span>Password</span>
                            </label>
                            <div class="control">
                                <input type="password" data-test="register-password" name="password" class="form-input" id="registerPassword" title="Password" value="{{ old('password') }}" />
                            </div>
                            <div class="field field-reserved field-error">
                                @error('password')
                                <ul class="messages">
                                    <li class="">
                                        {{ $message }}
                                    </li>
                                </ul>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Confirm -->
                        <div class="field">
                            <label class="label" for="registerPasswordConfirm">
                                <span>Confirm Password</span>
                            </label>
                            <div class="control">
                                <input type="password" data-test="register-passwordConfirm" name="password_confirmation" class="form-input" id="registerPasswordConfirm" title="Password Confirm" value="{{ old('password_confirmation') }}" />
                            </div>
                            <div class="field field-reserved field-error">
                                @error('email')
                                <ul class="password_confirmation">
                                    <li class="">
                                        {{ $message }}
                                    </li>
                                </ul>
                                @enderror
                            </div>
                        </div>

                        <!-- Register newsletter -->
                        <div class="field choice">
                            <div>
                                <input type="checkbox" data-test="register-newsletter" name="subscribed" class="form-select" id="registerNewsletter" title="Register for Newsletter" value="1" />
                            </div>
                            <label class="label" for="registerNewsletter">
                                <span>Sign up for newsletter</span>
                            </label>
                        </div>
                    </fieldset>
                    <div>
                        <p>
                            Creating an account has many benefits: check out faster, keep more than one address, track
                            orders and more.
                        </p>
                    </div>
                    <div class="actions-toolbar pt-6 pb-2 flex self-end">
                        <button type="submit" class="btn btn-primary">
                            <span>Create an Account</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop