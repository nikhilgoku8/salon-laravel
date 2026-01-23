<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $mailData['subject'] }}</title>
</head>
<body>
@if (is_array($mailData['body']))
	<table border="1" style="border-collapse:collapse;" cellpadding="10">
		@foreach($mailData['body'] as $key => $value)
		<tr>
			<td>{{ $key }}</td>
			<td>
				@if(is_array($value))
		            {{ implode(', ', $value) }}
		        @else
		            {{ $value }}
		        @endif
			</td>
		</tr>
		@endforeach
	</table>
@else
	{{ $mailData['body'] ?? 'Test Email' }}
@endif
</body>
</html>