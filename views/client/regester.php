<style>
  form {
    max-width: 400px;
    margin: 40px auto;
    padding: 25px 30px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  form p {
    margin-bottom: 18px;
  }
  form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
  }
  form input[type="text"] {
    width: 100%;
    padding: 10px 12px;
    font-size: 1rem;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    transition: border-color 0.3s ease;
  }
  form input[type="text"]:focus {
    border-color: #007BFF;
    outline: none;
  }
  form button {
    width: 100%;
    padding: 12px 0;
    font-size: 1.1rem;
    font-weight: 700;
    background-color: #007BFF;
    border: none;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  form button:hover {
    background-color: #0056b3;
  }
</style>

<form action="<?=BASE_URL.'?action=check'?>" method="post">
    <p>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
    </p>
    <p>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" required>
    </p>
    <button type="submit">Lưu</button>
</form>
