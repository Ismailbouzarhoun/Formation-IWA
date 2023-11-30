package univ.iwa.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import univ.iwa.model.Filiere;
import univ.iwa.repository.FiliereRepository;

@Service
public class FiliereService {
	@Autowired FiliereRepository filiereRepository;
	public List<Filiere> getAllFilieres() {
		return filiereRepository.findAll();
	}
	public Optional<Filiere> getFiliereById(Long Id) {
		return filiereRepository.findById(Id);
	}

	public Filiere addFiliere(Filiere filiere) {
		return filiereRepository.save(filiere);
	}

	public void deleteFiliere(Long id) {

		filiereRepository.deleteById(id);
	}
	public Filiere updateFiliere(Filiere filiere) {
		return filiereRepository.save(filiere);
	}
}
