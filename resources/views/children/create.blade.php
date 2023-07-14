<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="px-4">
        <h1>Create Child Data</h1>
        <div>
            @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{route('child.store')}}">
            @csrf
            @method("post")
            <table>
                <tr>
                    <td>
                        <input type="text" name="childFirstName" value="{{ old('childFirstName') }}" placeholder="child First Name" class="w-100" />
                    </td>
                    <td>
                        <input type="text" name="childMiddleName" value="{{ old('childMiddleName') }}" placeholder="child Middle Name" class="w-100" />
                    </td>
                    <td>
                        <input type="text" name="childLastName" value="{{ old('childLastName') }}" placeholder="child Last Name" class="w-100" />
                    </td>
                    <td>
                        <input type="text" name="childAge" value="{{ old('childAge') }}" class="w-100" placeholder="child Age" />
                    </td>
                    <td>
                        <select name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="differentAddress" class="different-address-checkbox" data-val="true" value="true"/>
                    </td>
                    <td>
                        <input type="text" name="childAddress" class="w-100" placeholder="child Address" disabled />
                    </td>
                    <td>
                        <input type="text" name="childCity" class="w-100" placeholder="child City" disabled />
                    </td>
                    <td>
                        <input type="text" name="childState" class="w-100" placeholder="child State" disabled />
                    </td>
                    <td>
                        <select name="childCountry" disabled >
                            <option value="">Select Country</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                            <option value="Nepal">Nepal</option>
                            <option value="India">India</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="childZipCode" class="w-100" placeholder="child Zip Code" disabled />
                    </td>
                </tr>
            </table>
    
            <div>
                <input type="submit" value="Create Child Data" class="btn btn-success">
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementsByName('differentAddress')[0].value = 0;
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