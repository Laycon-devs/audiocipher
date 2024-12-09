
---

# **Audiocipher: A Secure Audio-Based Steganography System**

**Audiocipher** is a web application designed to securely encrypt and decrypt text messages within audio files. Using steganography, this system hides text messages in audio files and allows users to securely exchange encrypted data. The application generates two unique keys: one for encryption and another for decryption. Users can upload audio files, encrypt messages, and later decrypt the messages by uploading the same audio file along with the corresponding decryption key.

## **Project Overview**

Audiocipher is built using the **Laravel** framework, providing a secure, easy-to-use interface for users to perform encryption and decryption operations. The system ensures the integrity of the audio file by checking the file's type, size, and metadata during both upload and decryption processes.

### **Key Features:**
- **Audio File Upload**: Users can upload `.mp3` and `.wav` audio files.
- **Text Encryption**: Text messages are securely encrypted into the uploaded audio file.
- **Audio File Renaming**: The uploaded audio is renamed for security purposes to avoid conflicts and ensure privacy.
- **Steganography Encryption & Decryption**: Uses AES-256 encryption with a generated key to hide messages within the audio file.
- **Unique Encryption & Decryption Keys**: The system generates and saves a unique encryption and decryption key pair for each audio file and message.
- **Decryption**: Users can upload the same audio file and provide the decryption key to retrieve the hidden message.

## **Installation Instructions**

Follow these steps to set up **Audiocipher** locally.

### **Requirements:**
- PHP >= 7.4
- Composer
- Laravel 8 or higher
- MySQL or any database supported by Laravel

### **Steps:**
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/audiocipher.git
   cd audiocipher
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

4. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

   You can now access the application in your browser at [http://localhost:8000](http://localhost:8000).

## **Usage**

### **Encrypting a Message**
1. **Upload an Audio File**: Choose a `.mp3` or `.wav` file from your computer.
2. **Enter Your Message**: Type the text you want to encrypt.
3. **Generate Keys**: The system will generate a unique encryption key and save it for later use. The audio file will be renamed and stored securely.
4. **Download the Encrypted Audio**: After encryption, the renamed audio file and keys will be provided for download.

### **Decrypting a Message**
1. **Upload the Encrypted Audio**: Upload the previously encrypted audio file.
2. **Provide the Decryption Key**: Enter the decryption key you received earlier.
3. **Retrieve the Message**: The system will verify the audio file and key, and if valid, will decrypt and display the hidden message.

## **Technical Details**

### **Encryption Method**
- **AES-256-CBC**: The message is encrypted using AES-256-CBC encryption.
- A 16-byte Initialization Vector (IV) is generated from the encryption key to ensure secure encryption.
- The IV and encrypted text are stored within the audio file, hidden using steganographic methods.

### **Key Generation**
- **Encryption Key**: A unique key consisting of uppercase letters and numbers is generated and used for encryption.
- **Decryption Key**: A separate decryption key is generated and can be used to decrypt the message within the audio.

## **Contributing**

If you'd like to contribute to **Audiocipher**, feel free to fork the repository, make your changes, and submit a pull request. We welcome contributions from the community.

### **Bug Reports and Feature Requests**
If you encounter any bugs or have suggestions for new features, please create an issue in the GitHub repository.

## **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---