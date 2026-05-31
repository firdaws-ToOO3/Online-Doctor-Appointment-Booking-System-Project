# 🏥 Online Doctor Appointment Booking System

> ระบบจองนัดพบแพทย์ออนไลน์ที่พัฒนาด้วย PHP และ HTML ช่วยให้ผู้ป่วยสามารถจองนัดแพทย์ได้สะดวก ไม่ต้องเดินทางมาจองที่โรงพยาบาล

---

## 📋 สารบัญ

- [ภาพรวมโปรเจค](#-ภาพรวมโปรเจค)
- [ฟีเจอร์หลัก](#-ฟีเจอร์หลัก)
- [ผู้ใช้งานในระบบ](#-ผู้ใช้งานในระบบ)
- [โครงสร้างโปรเจค](#-โครงสร้างโปรเจค)
- [การติดตั้งและใช้งาน](#-การติดตั้งและใช้งาน)
- [หน้าจอระบบ](#-หน้าจอระบบ)
- [เทคโนโลยีที่ใช้](#-เทคโนโลยีที่ใช้)

---

## 🎯 ภาพรวมโปรเจค

ระบบจองนัดพบแพทย์ออนไลน์ที่ออกแบบมาเพื่อแก้ปัญหาการต้องเดินทางมาจองนัดที่โรงพยาบาลหรือคลินิกด้วยตนเอง ผู้ป่วยสามารถดูข้อมูลแพทย์ จองนัด และจัดการนัดหมายได้ผ่านเว็บเบราว์เซอร์ ในขณะที่แพทย์และผู้ดูแลระบบสามารถบริหารจัดการตารางนัดและข้อมูลผู้ป่วยได้อย่างมีประสิทธิภาพ

---

## ✨ ฟีเจอร์หลัก

### สำหรับผู้ป่วย (Patient)
- **สมัครสมาชิก / เข้าสู่ระบบ** — จัดการบัญชีผู้ใช้
- **จองนัดแพทย์** — เลือกแพทย์ วันที่ และเวลาที่ต้องการ
- **ดูประวัติการนัด** — ตรวจสอบนัดหมายที่ผ่านมาและที่จะถึง
- **แก้ไขโปรไฟล์** — อัปเดตข้อมูลส่วนตัว

### สำหรับแพทย์ (Doctor)
- **จัดการตารางนัด** — ดูและยืนยันการนัดหมายของผู้ป่วย
- **ดูข้อมูลผู้ป่วย** — เข้าถึงประวัติและรายละเอียดผู้ป่วย

### สำหรับผู้ดูแลระบบ (Admin)
- **จัดการข้อมูลแพทย์** — เพิ่ม / แก้ไข / ลบข้อมูลแพทย์
- **จัดการนัดหมาย** — ดูภาพรวมนัดหมายทั้งหมดในระบบ
- **จัดการผู้ใช้งาน** — บริหารบัญชีผู้ป่วยในระบบ

---

## 👥 ผู้ใช้งานในระบบ

```
┌─────────────────────────────────────────────────────┐
│                   ระบบจองนัดแพทย์                    │
├──────────────┬──────────────────┬───────────────────┤
│   ผู้ป่วย      │      แพทย์        │    ผู้ดูแลระบบ    │
│  (Patient)   │     (Doctor)     │     (Admin)       │
├──────────────┼──────────────────┼───────────────────┤
│ - จองนัด     │ - ดูตารางนัด     │ - จัดการแพทย์     │
│ - ดูประวัติ  │ - ยืนยันนัด      │ - จัดการนัดหมาย   │
│ - แก้โปรไฟล์ │ - ดูข้อมูลผู้ป่วย │ - จัดการผู้ใช้    │
└──────────────┴──────────────────┴───────────────────┘
```

---

## 📁 โครงสร้างโปรเจค

```
Online-Doctor-Appointment-Booking-System-Project/
├── 📄 ProjectFinal1.html      # หน้าหลัก (Landing Page / UI)
├── 🐘 Profile.php             # หน้าโปรไฟล์ผู้ใช้ + จัดการข้อมูลส่วนตัว
├── 🐘 [login/register].php    # ระบบ Authentication
├── 🐘 [appointment].php       # ระบบจองและจัดการนัดหมาย
├── 🐘 [doctor].php            # หน้าจอสำหรับแพทย์
├── 🐘 [admin].php             # หน้าจอสำหรับผู้ดูแลระบบ
└── 🗄️ [database].sql          # โครงสร้างฐานข้อมูล
```

> 📝 อัปเดตโครงสร้างให้ตรงกับไฟล์จริงในโปรเจค

---

## 🚀 การติดตั้งและใช้งาน

### สิ่งที่ต้องมีก่อน

- **XAMPP** หรือ **WAMP** (Apache + PHP + MySQL)
- PHP 7.4 ขึ้นไป
- MySQL 5.7 ขึ้นไป
- เว็บเบราว์เซอร์ทั่วไป

### ขั้นตอนการติดตั้ง

**1. Clone โปรเจค**

```bash
git clone https://github.com/firdaws-ToOO3/Online-Doctor-Appointment-Booking-System-Project.git
```

**2. วางโฟลเดอร์ใน htdocs**

```
C:\xampp\htdocs\Online-Doctor-Appointment-Booking-System-Project\
```

**3. สร้างฐานข้อมูล**

เปิด [phpMyAdmin](http://localhost/phpmyadmin) แล้ว:
- สร้าง database ใหม่ชื่อ `doctor_appointment` (หรือตามที่กำหนดในโค้ด)
- Import ไฟล์ `.sql` ที่อยู่ในโปรเจค

**4. ตั้งค่าการเชื่อมต่อฐานข้อมูล**

แก้ไขไฟล์ config (เช่น `db_connect.php` หรือ `config.php`):

```php
$host     = "localhost";
$username = "root";
$password = "";          // ใส่ password ของ MySQL
$database = "doctor_appointment";
```

**5. เปิดเว็บไซต์**

```
http://localhost/Online-Doctor-Appointment-Booking-System-Project/ProjectFinal1.html
```

---

## 🖥️ หน้าจอระบบ

| หน้า | URL | คำอธิบาย |
|------|-----|---------|
| หน้าหลัก | `/ProjectFinal1.html` | Landing page แสดงข้อมูลระบบ |
| โปรไฟล์ผู้ใช้ | `/Profile.php` | แก้ไขข้อมูลส่วนตัว |
| จองนัดแพทย์ | `/[appointment].php` | เลือกแพทย์และเวลานัด |
| หน้าแพทย์ | `/[doctor].php` | ตารางนัดหมายของแพทย์ |
| Admin Dashboard | `/[admin].php` | บริหารจัดการระบบ |

---

## 🛠 เทคโนโลยีที่ใช้

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php&logoColor=white)
![HTML](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?logo=xampp&logoColor=white)

- **Backend**: PHP (Server-side scripting)
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Server**: Apache (via XAMPP/WAMP)
- **Session Management**: PHP Sessions สำหรับ Authentication

---

## 👤 ผู้พัฒนา

**[ชื่อของคุณ]**  
[LinkedIn](https://linkedin.com/in/yourprofile) · [GitHub](https://github.com/firdaws-ToOO3)

---

*โปรเจคนี้พัฒนาเพื่อวัตถุประสงค์ทางการศึกษา*
