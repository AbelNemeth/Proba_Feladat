<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Edit Project</h1>

        <form action="{{ route('projects.add') }}" method="POST"> 
            @csrf 
            
            <div>
                <label for="id">Project ID:</label>
                <input type="text" id="id" name="id" value="{{ $nextId }}" readonly>
            </div>

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Kész">Kész</option>
                    <option value="folyamatban">Folyamatban</option>
                    <option value="fejlesztésre vár">Fejlesztésre vár</option>
                </select>
            </div>

            <div>
                <label for="contacts">Select Contacts:</label>
                <select id="contacts" name="contacts[]" multiple required>
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }} ({{ $contact->email }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit">Add Project</button>
            </div>
        </form>
    </div>
    <div>
    <h1>Edit Contact</h1>

        <form action="{{ route('contacts.add') }}" method="POST">
            @csrf

            <div>
                <label for="contact_name">Contact Name:</label>
                <input type="text" id="contact_name" name="name" required>
            </div>

            <div>
                <label for="contact_email">Contact Email:</label>
                <input type="email" id="contact_email" name="email" required>
            </div>

            <div>
                <button type="submit">Add Contact</button>
            </div>
        </form>
    </div>
</body>
</html>