package univ.iwa.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class Test {
	@GetMapping("hello1")
	public String hello1(@RequestParam String nom) {
		return "Bonjour " +nom;
	}
	@GetMapping("hello2/{nom}")
	public String hello2(@PathVariable String nom) {
		return "Bonjour "+nom;
	}

}
