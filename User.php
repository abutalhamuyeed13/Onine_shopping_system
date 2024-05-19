<?php

function insertUser($name, $email, $phone, $password, $address)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (name, email, phone, password, address) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $password, $address);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $result;
}

function loginUser($email, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row;
}

function updateUser($id, $name, $email, $phone, $password, $address)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET name = ?, email = ?, phone = ?, password = ?, address = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $password, $address, $id);
    $result = $stmt->execute();

    if ($result) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        return $row;
    } else {
        $stmt->close();
        $conn->close();

        return false;
    }
}

function getUser($id)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row;
}
