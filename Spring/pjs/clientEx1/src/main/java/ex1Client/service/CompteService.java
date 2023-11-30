package ex1Client.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import ex1Client.model.Compte;
import ex1Client.repository.ClientRepository;
import ex1Client.repository.CompteRepository;

@Service
public class CompteService {
	@Autowired CompteRepository compteRepository;
	@Autowired ClientRepository clientRepository;
	public List<Compte> getAllComptes(){
		return compteRepository.findAll();
	}
	public Compte addCompte(Compte compte, Long id) {
		compte.setClient(clientRepository.findById(id).get());
		return compteRepository.save(compte);
	}
}
