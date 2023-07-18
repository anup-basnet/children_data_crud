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
        <!-- <div class="position-absolute bottom-20 start-50 bg-success rounded">
            @if(session()->has('success'))
            <p class="px-2">
                {{session('success')}}
            </p>
            @endif
        </div> -->
        <div>
            <button class="btn btn-primary" id="add-new-row">Add New</button>
        </div>
    </section>

    <main class="px-4">
        <table id="children-table">
            <tbody>
                @foreach($children as $child)
                    <tr>
                        <td>
                            <form method="post" action="{{route('child.delete', ['child' => $child])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                        <td>
                            <input type="text" name="childFirstName" placeholder="Child First Name" class="w-100" value="{{ $child->childFirstName }}" required />
                        </td>
                        <td>
                            <input type="text" name="childMiddleName" placeholder="Child Middle Name" class="w-100" value="{{   $child->childMiddleName }}" required />
                        </td>
                        <td>
                            <input type="text" name="childLastName" placeholder="Child Last Name" class="w-100" value="{{  $child->childLastName }}" required />
                        </td>
                        <td>
                            <input type="text" name="childAge" placeholder="Child Age" class="w-100" value="{{ $child->childAge }}" required />
                        </td>
                        <td>
                            <select name="gender" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $child->gender=="Male" ? "selected" : "" }}>Male</option>
                                <option value="Female" {{ $child->gender=="Female" ? "selected" : "" }}>Female</option>
                            </select>
                        </td>
                        <td>
                            <input type="checkbox" name="differentAddress" class="w-75 different-address-checkbox" value="{{$child->differentAddress}}" {{ $child->differentAddress=="1" ? "checked" : "" }}>
                            <label for="differentAddress" style="width: 3.5rem;">Different Address?</label>
                        </td>
                        <td>
                            <input type="text" name="childAddress" placeholder="Child Address" class="w-100" value="{{$child->childAddress}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                        </td>
                        <td>
                            <input type="text" name="childCity" placeholder="Child City" class="w-100" value="{{$child->childCity}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                        </td>
                        <td>
                            <input type="text" name="childState" placeholder="Child State" class="w-100" value="{{$child->childState}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                        </td>
                        <td>
                            <select name="childCountry" {{ $child->differentAddress=="1" ? "" : "disabled" }} >
                                <option value="">Country</option>
                                <option value="USA"{{ $child->childCountry=="USA" ? "selected" : "" }}>USA</option>
                                <option value="Canada" {{ $child->childCountry=="Canada" ? "selected" : "" }}>Canada</option>
                                <option value="UK" {{ $child->childCountry=="Nepal" ? "selected" : "" }}>Nepal</option>
                                <option value="UK" {{ $child->childCountry=="India" ? "selected" : "" }}>India</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </td>
                        <td>
                            <input type="text" name="childZipCode" placeholder="Child Zip Code" class="w-100" value="{{$child->childZipCode}}" {{ $child->differentAddress=="1" ? "" : "disabled" }} >
                        </td>
                        <td>
                            <a class="btn btn-secondary"
                            href="{{route('child.edit', ['child' => $child] )}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <form method="post" action="{{ route('child.store') }}" id="children-form">
        @csrf
        @method('post')
            <table>
                
            </table>
        </form>

        <div>
            <button class="btn btn-success d-none" type="submit" id="save-row" form="children-form">Save</button>
        </div>

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
                    <tr id="new-row">
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
                            <select name="gender" required>
                                <option value="">Gender</option>
                                <option value="Male" {{ old('gender')=="Male" ? "selected" : "" }} >Male</option>
                                <option value="Female" {{ old('gender')=="Female" ? "selected" : "" }} >Female</option>
                            </select>
                        </td>
                        <td class="">
                            <input type="checkbox" name="differentAddress" class="different-address-checkbox w-75" {{ old('differentAddress')=="1" ? "checked" : "" }} />
                            <label for="differentAddress" style="width: 3.5rem;">Different Address?</label>
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
                            <select name="childCountry" disabled >
                                <option value="">Country</option>
                                <option value="USA" {{ old('childCountry')=="USA" ? "selected" : "" }}>USA</option>
                                <option value="Canada" {{ old('childCountry')=="Canada" ? "selected" : "" }}>Canada</option>
                                <option value="Nepal" {{ old('childCountry')=="Nepal" ? "selected" : "" }}>Nepal</option>
                                <option value="India" {{ old('childCountry')=="India" ? "selected" : "" }}>India</option>
                            </select>
                        </td>
                        <td><input type="text" name="childZipCode" placeholder="child Zip Code" disabled class="w-100" value="{{ old('childZipCode') }}" /></td>
                    </tr>
                `;
                $('#children-form table').append(newRow);

                var newRowCheckbox = $("#new-row").find('input.different-address-checkbox')[0];
                if(newRowCheckbox.checked){
                    newRowCheckbox.value = 0;
                } else {
                    newRowCheckbox.value = 1;
                }

                // show save btn
                $('#save-row').removeClass('d-none');
                
            });

            // Enable/disable fields based on checkbox state
            $(document).on('change', '.different-address-checkbox', function() {
                var isChecked = $(this).prop('checked');
                var row = $(this).closest('tr');
                var inputs = row.find('input[name^="childAddress"], input[name^="childCity"], input[name^="childState"], select[name^="childCountry"], input[name^="childZipCode"]');
                var current_checkbox = row.find('input.different-address-checkbox')[0];

                if (isChecked) {
                    inputs.removeAttr('disabled');
                    current_checkbox.value = 1;  
                } else {
                    inputs.attr('disabled', 'disabled');
                    current_checkbox.value = 0;  
                }
            });

            // Delete row --> new row
            $(document).on('click', '.delete-row', function() {
                var $tr = $(this).closest('tr');
                $tr.remove();
            });

            // Show Previous Data on error
            if($('.text-danger').length > 0){
                $('#add-new-row').click();
                var checkbox = $('#new-row input.different-address-checkbox')[0];
                if(checkbox.checked){
                    var row = $('#new-row input.different-address-checkbox').closest('tr');
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