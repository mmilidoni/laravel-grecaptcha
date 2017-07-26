# laravel-grecaptcha

This package allows an easily management of Google Recaptcha on your Laravel projects. 

## Prerequisites
Google Recaptcha V2 *site key* and *secret key* available on [ReCAPTCHA website](https://www.google.com/recaptcha/)

## Installation
`composer require mmilidoni/grecaptcha`

### Configuration
Add your Recaptcha *site key* and *secret key* on `config/services.php`

```php
"grecaptcha" => [
        "secret" => "*****",
        "sitekey" => "****",
    ],
```

### View
Insert the following line on your HTML header
```html
<script src='https://www.google.com/recaptcha/api.js'></script>
```

Insert the following line on your HTML form
```html
<div class="g-recaptcha" data-sitekey="{{ config("services.grecaptcha.sitekey") }}"></div>
```

### Controller
```php
public function store(\Illuminate\Http\Request $request) {
  $a = new Grecaptcha;
  if ($a->check($request)) {
    // Recaptcha OK
  } else {
    // Recaptcha KO
  }
}
```
