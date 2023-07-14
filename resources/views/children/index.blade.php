<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Table</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section class="p-4 position-relative">
        <h1>Children Table</h1>
        <div class="position-absolute bottom-20 start-50 bg-success rounded">
            @if(session()->has('success'))
            <p class="px-2">
                {{session('success')}}
            </p>
            @endif
        </div>
        <div>
            <button class="btn btn-primary" id="add-new-row">Add New</button>
        </div>
    </section>

    <main class="px-4">
        <table id="children-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Child First Name</th>
                    <th>Child Middle Name</th>
                    <th>Child Last Name</th>
                    <th>Child Age</th>
                    <th>Child Gender</th>
                    <th>Different Address?</th>
                    <th>Child Address</th>
                    <th>Child City</th>
                    <th>Child State</th>
                    <th>Child Country</th>
                    <th>Child Zip Code</th>
                    <th>Edit Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($children as $child)
                    <tr>
                        <!-- <td>
                            <button class="delete-row">Delete</button>
                        </td> -->
                        <td>
                            <form method="post" action="{{route('child.delete', ['child' => $child])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                        <td>{{$child->childFirstName}}</td>
                        <td>{{$child->childMiddleName}}</td>
                        <td>{{$child->childLastName}}</td>
                        <td>{{$child->childAge}}</td>
                        <td>{{$child->gender}}</td>
                        <td>{{$child->differentAddress ? 'Yes' : 'No'}}</td>
                        <td>{{$child->childAddress}}</td>
                        <td>{{$child->childCity}}</td>
                        <td>{{$child->childState}}</td>
                        <td>{{$child->childCountry}}</td>
                        <td>{{$child->childZipCode}}</td>
                        <td>
                            <a href="{{route('child.edit', ['child' => $child])}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <form method="post" action="{{route('child.store')}}" id="children-form">
        @csrf
        @method('post')
            <table>
                
            </table>
        </form>

        <div class="mt-3">
            @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
         // Add new row
            $('#add-new-row').click(function() {
                var newRow = `
                    <tr>
                        <td>
                            <button class="w-100 btn btn-danger delete-row">Delete</button>
                        </td>
                        <td>
                            <input type="text" name="childFirstName" placeholder="child First Name" class="w-100" value="{{ old('childFirstName') }}" required />
                        </td>
                        <td>
                            <input type="text" name="childMiddleName" placeholder="child Middle Name" class="w-100" value="{{ old('childMiddleName') }}" required />
                        </td>
                        <td>
                            <input type="text" name="childLastName" placeholder="child Last Name" class="w-100" value="{{ old('childLastName') }}" required />
                        </td>
                        <td>
                            <input type="text" name="childAge" placeholder="child Age" class="w-100" value="{{ old('childAge') }}" required />
                        </td>
                        <td>
                            <select name="gender" class="w-100" required>
                                <option value="">Gender ___</option>
                                <option value="Male" {{ old('gender')=="Male" ? "selected" : "" }} >Male</option>
                                <option value="Female" {{ old('gender')=="Female" ? "selected" : "" }} >Female</option>
                            </select>
                        </td>
                        <td class="px-2">
                            <input type="checkbox" name="differentAddress" class="different-address-checkbox w-100" {{ old('differentAddress')=="1" ? "checked" : "" }} />
                        </td>
                        <td>
                            <input type="text" name="childAddress" placeholder="child Address" disabled class="w-100" value="{{ old('childAddress') }}" />
                        </td>
                        <td>
                            <input type="text" name="childCity" placeholder="child City" disabled class="w-100" value="{{ old('childCity') }}" />
                        </td>
                        <td>
                            <input type="text" name="childState" placeholder="child State" disabled class="w-100" value="{{ old('childState') }}" />
                        </td>
                        <td>
                            <select name="childCountry" disabled class="w-100">
                                <option value="">Country ___</option>
                                <option value="USA" {{ old('childCountry')=="USA" ? "selected" : "" }}>USA</option>
                                <option value="Canada" {{ old('childCountry')=="Canada" ? "selected" : "" }}>Canada</option>
                                <option value="Nepal" {{ old('childCountry')=="Nepal" ? "selected" : "" }}>Nepal</option>
                                <option value="India" {{ old('childCountry')=="India" ? "selected" : "" }}>India</option>
                            </select>
                        </td>
                        <td><input type="text" name="childZipCode" placeholder="child Zip Code" disabled class="w-100" value="{{ old('childState') }}" /></td>
                    </tr>
                `;
                // $('#children-table tbody').append(newRow);
                $('#children-form table').append(newRow);
                var saveBtn = `
                    <tr>
                        <td>
                            <input type="submit" value="Save" class="btn btn-success save-row">
                        </td>
                    </tr>
                `;
                $('#children-form table').append(saveBtn);


                $("input[type='checkbox']").value = 0;
                // Enable/disable fields based on checkbox state
                $(document).on('change', '.different-address-checkbox', function() {
                    var isChecked = $(this).prop('checked');
                    var row = $(this).closest('tr');
                    var inputs = row.find('input[name^="childAddress"], input[name^="childCity"], input[name^="childState"], select[name^="childCountry"], input[name^="childZipCode"]');

                    if (isChecked) {
                        inputs.removeAttr('disabled');
                        document.getElementsByName('differentAddress')[0].value = 1;
                    } else {
                        inputs.attr('disabled', 'disabled');
                    }
                });
            });

            // Delete row
            $(document).on('click', '.delete-row', function() {
                var $tr = $(this).closest('tr');
                $tr.next('tr').remove();
                $tr.remove();
            });

            // Show Previous Data on error
            if($('.text-danger').length > 0){
                $('#add-new-row').click();
                var checkbox = $('.different-address-checkbox')[0];
                if(checkbox.checked){
                    var row = $('.different-address-checkbox').closest('tr');
                    var inputs = row.find('input[name^="childAddress"], input[name^="childCity"], input[name^="childState"], select[name^="childCountry"], input[name^="childZipCode"]');
                    inputs.removeAttr('disabled');
                    checkbox.value = 1;
                } else {
                    checkbox.value = 0;
                }
            }
        });
    </script>
</body>
</html>