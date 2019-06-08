# DataTypes lib

This lib provides Binary buffer capabilities, also Base16, Base64, Bitwise (Base2) buffers/objects for proper type handling, 
BigNumber objects via BcMath and several helper functions that are essential for libs and apps.

## Requirements

* PHP >= 7.1
* ext-bcmath
* ext-mbstring

## Installation

`composer require comely-io/data-types`

# Documentation

## BigNumber



## Buffers

### Binary

### Bitwise (Base2)

### Base16

### Base64

## Helpers

#### `Comely\DataTypes\Strings`
Method | Arguments | Returns | Description
--- | --- | --- | ---
asciiEncode | <ul><li>`string` $ascii</li></ul> | `Base16` | Encodes ASCII string (ISO-8859 or Windows 1252 charset) into Hexadecimal (Base16) representation.
asciiDecode | <ul><li>`Base16` $hex</li></ul> | `string` | Decodes Hexadecimal/Base16 object and returns ASCII string.


#### `Comely\DataTypes\Integers`
Method | Arguments | Returns | Description
--- | --- | --- | ---
Range | <ul><li>`int` $num</li><li>`int` $from</li><li>`int` $to</li></ul> | `bool` | Checks if first argument is an integer within second and third integer arguments.

#### `Comely\DataTypes\Time`
Method | Arguments | Returns | Description
--- | --- | --- | ---
difference | <ul><li>`int` $stamp1</li><li>`int`/`NULL` $stamp2</li></ul> | `int` | Returns difference between 2 timestamps (number of seconds) from givens timestamps. If second argument is NULL, then current timestamp using `time()` func is used.
minutesDifference | <ul><li>`int` $stamp1</li><li>`int`/`NULL` $stamp2</li></ul> | `float` | Returns minutes difference between 2 timestamps, returns float with 1 digit after decimal point.
hoursDifference | <ul><li>`int` $stamp1</li><li>`int`/`NULL` $stamp2</li></ul> | `float` | Returns hours difference between 2 timestamps, returns float with 1 digit after decimal point.






