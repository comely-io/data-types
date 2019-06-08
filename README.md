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

### Comely\DataTypes\Strings
Method | Arguments | Returns | Description
--- | --- | --- | ---
asciiEncode | `string` $ascii | `Base16` | Encodes ASCII string (ISO-8859 or Windows 1252 charset) into Hexadecimal (Base16) representation
asciiDecode | `Base16` $hex | `string` | Decodes Hexadecimal/Base16 object and returns ASCII string


### Comely\DataTypes\Integers
Method | Arguments | Returns | Description
--- | --- | --- | ---
Range | <ul><li>`int` $num</li><li>`int` $from</li><li>`int` $to</li></ul> | `bool` | Checks if first argument is a number within second and third argument





