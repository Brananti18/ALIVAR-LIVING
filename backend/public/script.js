document.getElementById('loginForm')
    .addEventListener('submit', async function (event) {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();

            if (response.ok) {
                alert('Login berhasil!');
                console.log('Respons login:', data);
            } else {
                alert(data.message || 'Email atau password salah.');
                console.log('Respons login:', data);
            }
        } catch (error) {
            alert('Gagal menghubungi API Laravel.');
            console.error(error);
        }
    });
