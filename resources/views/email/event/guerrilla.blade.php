@extends('email.layouts.app')

@section('email-content')

    <table style="width: 100%;">
        <tr>
            <td>
                <h1 style="font-family: 'Quicksand', sans-serif; font-size: 30px; text-align: center; font-weight: bold;">Dear {{ $name }}, thank you for signing up to our events</h1>
            </td>
        </tr>
        <tr>
            <table style="width: 500px; border-collapse: collapse; margin: 0 auto;">
                <tr style="border: 1px solid #FECE51">
                    <td style="background-color: #FECE51">
                        <p style="font-family: 'Quicksand', sans-serif; font-size: 20px; text-align: center;">
                            Below is your experience code
                        </p>
                    </td>
                </tr>
                <tr style="border: 1px solid #FECE51">
                    <td>
                        <p style="font-family: 'PT Sans', sans-serif; font-size: 20px; text-align: center; font-weight: bolder; letter-spacing: 5px;">
                            {{ $code }}
                        </p>
                    </td>
                </tr>
            </table>
        </tr>
    </table>

@endsection