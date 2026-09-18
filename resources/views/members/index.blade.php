<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Members - {{ $project->name }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #F8F7F7;
            color: #47201B;
        }

        .page {
            min-height: 100vh;
            padding: 40px 60px;
        }

        /* HEADER */

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #511E1D;
        }

        .back-button {
            text-decoration: none;
            color: #511E1D;
            font-size: 14px;
            font-weight: 600;
        }

        /* PROJECT HEADER */

        .project-header {
            background: #47201B;
            color: #F8F7F7;
            border-radius: 24px;
            padding: 35px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .project-header::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: #CA7340;
            border-radius: 50%;
            right: -60px;
            top: -70px;
            opacity: 0.7;
        }

        .project-label {
            color: #E1D3C4;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .project-title {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .project-description {
            color: #E1D3C4;
            max-width: 600px;
            line-height: 1.6;
            font-size: 14px;
        }

        /* CONTENT */

        .content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 28px;
            border: 1px solid #E1D3C4;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #47201B;
        }

        .member-count {
            background: #E3EEE8;
            color: #511E1D;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* MEMBER */

        .member {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px;
            border-radius: 15px;
            background: #F8F7F7;
            margin-bottom: 12px;
        }

        .member:last-child {
            margin-bottom: 0;
        }

        .member-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            background: #E1D3C4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #511E1D;
            font-weight: bold;
            font-size: 16px;
        }

        .member-name {
            font-size: 15px;
            font-weight: bold;
            color: #47201B;
            margin-bottom: 4px;
        }

        .member-email {
            font-size: 12px;
            color: #996561;
        }

        .remove-button {
            border: none;
            background: transparent;
            color: #996561;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            padding: 8px;
        }

        .remove-button:hover {
            color: #CA7340;
        }

        /* SIDE CARD */

        .side-card {
            background: #E1D3C4;
            border-radius: 20px;
            padding: 25px;
        }

        .side-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #47201B;
        }

        .side-text {
            color: #511E1D;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .invite-button {
            display: block;
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 12px;
            background: #CA7340;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .invite-button:hover {
            background: #511E1D;
        }

        /* SUCCESS */

        .success {
            background: #E3EEE8;
            color: #47201B;
            padding: 13px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* EMPTY */

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #996561;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {
            .page {
                padding: 25px;
            }

            .content {
                grid-template-columns: 1fr;
            }

            .project-title {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="brand">ZARA</div>

        <a href="#" class="back-button">
            ← Back to Project
        </a>
    </div>


    <!-- PROJECT HEADER -->
    <div class="project-header">

        <div class="project-label">
            Project Members
        </div>

        <h1 class="project-title">
            {{ $project->name }}
        </h1>

        @if($project->description)
            <p class="project-description">
                {{ $project->description }}
            </p>
        @endif

    </div>


    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="success">
            {{ session('error') }}
        </div>
    @endif


    <!-- CONTENT -->
    <div class="content">

        <!-- MEMBER LIST -->
        <div class="card">

            <div class="card-header">

                <h2 class="card-title">
                    Team Members
                </h2>

                <span class="member-count">
                    {{ $members->count() }} Members
                </span>

            </div>


            @forelse($members as $member)

                <div class="member">

                    <div class="member-left">

                        <div class="avatar">
                            {{ strtoupper(substr($member->user->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="member-name">
                                {{ $member->user->name }}
                            </div>

                            <div class="member-email">
                                {{ $member->user->email }}
                            </div>
                        </div>

                    </div>


                    <form
                        action="{{ route('projects.members.destroy', [$project, $member->user]) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="remove-button"
                        >
                            Remove
                        </button>

                    </form>

                </div>

            @empty

                <div class="empty">

                    <div class="empty-icon">
                        ♡
                    </div>

                    <p>
                        Belum ada member di project ini.
                    </p>

                </div>

            @endforelse

        </div>


        <!-- SIDE CARD -->
        <div class="side-card">

            <h3 class="side-title">
                Collaborate
            </h3>

            <p class="side-text">
                Tambahkan anggota lain ke project ini
                agar kalian dapat mengerjakan task
                bersama-sama.
            </p>

        <form
            action="{{ route('projects.members.store', $project) }}"
            method="POST"
        >
            @csrf

            <select
                name="user_id"
                required
                style="
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #E1D3C4;
                    border-radius: 12px;
                    margin-bottom: 12px;
                    background: #F8F7F7;
                    color: #47201B;
                "
            >
                <option value="">Pilih user...</option>

                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} — {{ $user->email }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="invite-button">
                + Invite Member
            </button>
        </form>

        </div>

    </div>

</div>

</body>
</html>