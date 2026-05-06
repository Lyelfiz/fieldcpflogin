# CPF Login Authentication Plugin for Moodle

**Developer:** Lyelfiz - Luiz Henrique Carvalho Vacilio  

> **IMPORTANT NOTE:** This plugin is under development. Use at your own risk!

![PHP](https://img.shields.io/badge/PHP-v7.0%20to%20v8.2-blue.svg)  
![Moodle](https://img.shields.io/badge/Moodle-v4.4.9+%20to%20v5.0.0+-orange.svg)  
![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)

---

## Description

This Moodle authentication plugin allows users to log in using their **CPF (Cadastro de Pessoas Físicas)** instead of the default username.

When a user enters a CPF in the login field:
- The plugin automatically removes formatting (`.` and `-`)
- Validates the CPF using official rules
- Searches for a matching user based on a custom profile field (`cpf`)
- Replaces the login input with the corresponding username

If a valid and unique match is found, the login proceeds normally.

---

## Requirements

- **Moodle Version:** 4.4.9 or higher  
- **PHP Version:** 7.0 to 8.2  
- **Required Configuration:**
  - A custom user profile field with:
    - **Shortname:** `cpf`
  - CPF values must be stored in this field

---

## Installation

1. Download archive and drop in:
   ```
   Site administration -> Plugins -> Install plugins
   ```

2. Go to:  
   **Site Administration > Notifications**

3. Complete the installation process.

---

## Enabling the Plugin

1. Navigate to:  
   **Site Administration > Plugins > Authentication > Manage authentication**

2. Enable:  
   **CPF Login for Custom Profile Field**

---

## Usage

After enabling:

- Users can log in using:
  - CPF (with or without formatting)
  - Username (normal behavior still works)

### Example

| Input | Result |
|------|--------|
| `12345678901` | Converted and matched |
| `123.456.789-01` | Cleaned and matched |

---

## How It Works

- Intercepts login via `loginpage_hook()`
- Cleans CPF input using regex
- Validates CPF digits
- Queries Moodle database:
  - `user`
  - `user_info_data`
  - `user_info_field`
- Replaces `$_POST['username']` with the actual username

---

## Limitations

- Only works if:
  - CPF is valid
  - Exactly **one user** matches the CPF
- Does not support:
  - Multiple users with same CPF
  - Invalid CPF attempts

---

## Security Notes

- Prevents invalid CPF attempts using checksum validation
- Does not expose user data
- Only modifies login input internally

---

## Contributing

Contributions are welcome!

- Report issues
- Suggest improvements
- Submit pull requests

---

## License

This plugin is licensed under the GPL v3 License.
