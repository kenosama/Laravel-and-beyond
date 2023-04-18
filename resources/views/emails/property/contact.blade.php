<x-mail::message>
# New request of contact

A new request of contact has been made for the Property : <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>.

- Firstname : {{ $data['firstname'] }}
- Last name : {{ $data['lastname'] }}
- Phone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message :**<br/>
{{ $data['message'] }}
</x-mail::message>
