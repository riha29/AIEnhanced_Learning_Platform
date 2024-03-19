// control/authController.js

const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

// Function to register a new user
async function register(req, res) {
  const { email, password } = req.body;
  try {
    // Encrypt the password
    const hashedPassword = await bcrypt.hash(password, 10);
    // Save the new user
    const user = await prisma.user.create({
      data: { email, password: hashedPassword },
    });
    // Respond with the created user (excluding password)
    res.status(201).json({ id: user.id, email: user.email });
  } catch (error) {
    res.status(400).json({ error: error.message });
  }
}

// Function to log in a user
async function login(req, res) {
  const { email, password } = req.body;
  try {
    // Find the user by email
    const user = await prisma.user.findUnique({ where: { email } });
    // Check the password
    if (user && (await bcrypt.compare(password, user.password))) {
      // Create a token
      const token = jwt.sign({ userId: user.id }, 'your_jwt_secret', { expiresIn: '24h' });
      // Respond with the token
      res.json({ token });
    } else {
      res.status(401).json({ error: 'Invalid email or password' });
    }
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

module.exports = { register, login };
