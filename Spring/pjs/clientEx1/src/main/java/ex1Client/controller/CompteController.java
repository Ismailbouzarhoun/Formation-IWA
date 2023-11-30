package ex1Client.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import ex1Client.model.Compte;
import ex1Client.service.CompteService;

@RestController
@RequestMapping("bank")
public class CompteController {
	@Autowired CompteService compteService;
	@GetMapping("comptes")
	public List<Compte> getAllComptes(){
		return compteService.getAllComptes();
	}
	@PostMapping("compte{id}")
	public Compte addCompte(@RequestBody Compte Compte ,@PathVariable Long id) {
		return compteService.addCompte(Compte, id);
	}
}
