# DataTypes lib

This lib provides Binary buffer capabilities, also Base16, Base64, Bitwise (Base2) buffers/objects for proper type handling, 
BigNumber objects via BcMath and several helper functions that are essential for libs and apps.

### Requirements

* PHP >= 7.1
* ext-bcmath
* ext-mbstring

### Installation

`composer require comely-io/data-types`

## Documentation

### BigNumber



### Buffers

#### Binary

#### Bitwise (Base2)

#### Base16

#### Base64

### Helpers

Class | Method | Arguments | Returns | Description
--- | --- | --- | --- | ---
`Comely\DataTypes\Strings` | asciiEncode | `string` $ascii | `Base16` | Encodes ASCII string (ISO-8859 or Windows 1252 charset) into Hexadecimal (Base16) representation
`Comely\DataTypes\Strings` | asciiDecode | `Base16` $hex | `string` | Decodes




