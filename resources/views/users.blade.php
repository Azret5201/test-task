@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h3 class="text-center">Статистика сколько раз переходили по ссылке</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Original URL</th>
                    <th scope="col">Short URL</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($short_urls as $url)
                    <tr>
                        <td>{{ $url->original_url }}</td>
                        <td>{{ 'http://test-task/short_url/'.$url->short_url }}</td>
                        <td>{{ $url->visits }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h3 class="text-center">Статистика сколько раз определеный IP-address переходил по ссылке</h3>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">IP</th>
                    <th scope="col">URL</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user_ips as $ip)
                    <tr>
                        <td>{{ $ip->ip_address }}</td>
                        <td>{{ 'http://test-task/short_url/'.$ip->short_url }}</td>
                        <td>{{ $ip->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 mb-5">
            <h3 class="text-center">Статистика сколько раз определеный User Agent переходил по ссылке</h3>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">User Agent</th>
                    <th scope="col">URL</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user_agents as $agent)
                    <tr>
                        <td>{{ $agent->user_agent }}</td>
                        <td>{{ 'http://test-task/short_url/'.$agent->short_url }}</td>
                        <td>{{ $agent->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
