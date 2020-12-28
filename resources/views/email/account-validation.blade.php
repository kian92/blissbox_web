@extends ('email.layouts.app')

@section('email-content')
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold">Verify your account</h1>
                <p style="font-family: 'Roboto', sans-serif;">Thank you for signing up.</p>
                <p style="font-family: 'Roboto', sans-serif;">Please click the button below to activate your account</p>
                <a href="{{ url('/user/activation/'.$email.'/'.$activation_code) }}" style="cursor: pointer; background: #FECE51; padding: 10px 35px; border-radius: 25px; text-decoration: none; color: #000; display: inline-block; margin: 0 auto;">Activate My Account</a>
            </td>
        </tr>
    </table>
@endsection