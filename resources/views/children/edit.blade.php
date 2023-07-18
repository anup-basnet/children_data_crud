<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="p-4">
    <h1>Edit Child Data</h1>
    <div>
        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('child.update', ['child' => $child])}}">
        @csrf
        @method("put")
        <table>
            <thead>
                <tr>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="childFirstName" class="w-100" placeholder="child First Name" value="{{$child->childFirstName}}">
                    </td>
                    <td>
                        <input type="text" name="childMiddleName" class="w-100" placeholder="child Middle Name" value="{{$child->childMiddleName}}">
                    </td>
                    <td>
                        <input type="text" name="childLastName" class="w-100" placeholder="child Last Name" value="{{$child->childLastName}}">
                    </td>
                    <td>
                        <input type="text" name="childAge" class="w-100" placeholder="child Age" value="{{$child->childAge}}">
                    </td>
                    <td>
                        <select name="gender" id="gender">
                            <option value="">Gender</option>
                            <option value="Male" {{ $child->gender=="Male" ? "selected" : "" }}>Male</option>
                            <option value="Female" {{ $child->gender=="Female" ? "selected" : "" }}>Female</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="differentAddress" class="different-address-checkbox w-75" value="{{$child->differentAddress}}" {{ $child->differentAddress=="1" ? "checked" : "" }} >
                        <!-- <label for="differentAddress">Different Address?</label> -->
                    </td>
                    <td>
                        <input type="text" name="childAddress" class="w-100" placeholder="child Address" value="{{$child->childAddress}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                    </td>
                    <td>
                        <input type="text" name="childCity" class="w-100" placeholder="child City" value="{{$child->childCity}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                    </td>
                    <td>
                        <input type="text" name="childState" class="w-100" placeholder="child State" value="{{$child->childState}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                    </td>
                    <td>
                        <select name="childCountry" id="country" {{ $child->differentAddress=="1" ? "" : "disabled" }} >
                            <option value="">Country</option>
                            <option value="USA" {{ $child->childCountry=="USA" ? "selected" : "" }}>USA</option>
                            <option value="Canada" {{ $child->childCountry=="Canada" ? "selected" : "" }}>Canada</option>
                            <option value="Nepal" {{ $child->childCountry=="Nepal" ? "selected" : "" }}>Nepal</option>
                            <option value="India" {{ $child->childCountry=="India" ? "selected" : "" }}>India</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="childZipCode" class="w-100" placeholder="child Zip Code" value="{{$child->childZipCode}}" {{ $child->differentAddress=="1" ? "" : "disabled" }}>
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <input type="submit" value="Update Child Data" class="btn btn-success mt-2">
        </div>
    </form>

    <!--  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // checkbox initial state
        var checkbox = $('.different-address-checkbox')[0];
        if(checkbox.checked){
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }
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
    </script>
</body>
</html>