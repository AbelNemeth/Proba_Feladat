<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('edit.index') }}">
        <button>Edit</button>
    </a>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Leírás</th>
                    <th>Státusz</th>
                    <th>Contact</th>
                    <th>Szerkesztés</th>
                    <th>Törlés</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{$project['id']}}</td>
                        <td>{{$project['name']}}</td>
                        <td>{{$project['description']}}</td>
                        <td>{{$project['status']}}</td>
                        <td>
                            @foreach ($project['contacts'] as $contact)
                                {{ $contact['id'] }} - {{ $contact['name'] }} - {{ $contact['email'] }}<br>
                            @endforeach
                        </td>
                        <td>
                        <form action="{{ route('edit.project', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('UPDATE')
                            <button type="submit" class="btn btn-danger">Szerkesztés</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{ route('projects.destroy', $project['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this project?');" class="btn btn-danger">Törlés</button>
                        </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>