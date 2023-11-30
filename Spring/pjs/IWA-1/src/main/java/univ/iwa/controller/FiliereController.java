package univ.iwa.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import univ.iwa.model.Etudiant;
import univ.iwa.model.Filiere;
import univ.iwa.service.EtudiantService;
import univ.iwa.service.FiliereService;

@RestController
@RequestMapping("api")
@CrossOrigin(origins = "*")
public class FiliereController {
	@Autowired FiliereService filiereService;
	@Autowired EtudiantService etudiantService;
	@GetMapping("/filieres")
	public List<Filiere> getAllFilieres() {
		return filiereService.getAllFilieres();
	}

	@GetMapping("/filieres/{id}")
	public Optional<Filiere> getFiliereById(@PathVariable Long Id) {
		return filiereService.getFiliereById(Id);
	}

	@PostMapping("/filieres")
	public Filiere addFiliere(@RequestBody Filiere filiere) {
		return filiereService.addFiliere(filiere);
	}

	@DeleteMapping("/filieres/{id}")
	public void deleteFiliere(@PathVariable Long id) {
		filiereService.deleteFiliere(id);
	}

	@PutMapping("/filieres")
	public Filiere updateFiliere(@RequestBody Filiere filiere) {
		return filiereService.updateFiliere(filiere);
	}

	@PostMapping("/filieres/{id}/etudiants")
	public Etudiant addEtudiantToFiliere(@PathVariable Long id,@RequestBody Etudiant etudiant) {
		etudiant.setFiliere(filiereService.getFiliereById(id).get());
		return etudiantService.addEtudiant(etudiant);
	}
	
	@GetMapping("/filieres/{id}/etudiants")
	public List<Etudiant> getEtudiantsByFiliere(@PathVariable Long id){
		return etudiantService.getEtudiantByFiliereId(id);
	}

}
