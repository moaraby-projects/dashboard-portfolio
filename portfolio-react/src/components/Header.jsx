import React, { useEffect } from 'react';
import logo from '../assest/logo.png'

function Header () {

    useEffect(() => {
        let menu = document.getElementById('menu-icon')
        let nav = document.querySelector('.header nav')

        menu.onclick = () => {
            menu.classList.toggle('bx-x')
            nav.classList.toggle('active')
        }



        let header = document.querySelector('.header')
        window.onscroll = () => {

            menu.classList.remove('bx-x')
            nav.classList.remove('active')

            if (window.scrollY > 100) {

                header.classList.add('active')
            }
            else {
                header.classList.remove('active')

            }


            let section = document.querySelectorAll('section')
            let links = document.querySelectorAll('.header nav a')

            section.forEach((sec) => {
                let top = window.scrollY;
                let offest = sec.offsetTop - 100;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id')

                if (top >= offest && top < offest + height) {
                    // active navbar link
                    links.forEach((link) => {
                        link.classList.remove('active')
                        document.querySelector('.header nav a[href*=' + id + ' ]').classList.add('active')
                    })

                    sec.classList.add('show-animate')
                } else {
                    sec.classList.remove('show-animate')
                }
            })

        }

    }, [])

    return (

        <div className='header'>
            <a href="#" className='logo'>
                <img src={logo} alt="" />
                <span className='animate' style={{ "--i": "1" }} ></span></a>
            <i className='bx bx-menu' id='menu-icon'><span className='animate' style={{ "--i": "2" }} ></span></i>

            <nav>
                <a href="#home" className='active'>Home</a>
                <a href="#about">About</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>

                <span className="active-nav"></span>
                <span className='animate' style={{ "--i": "2" }} ></span>
            </nav>

        </div>
    );
}

export default Header;