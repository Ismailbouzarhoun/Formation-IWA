package ex1Client.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import ex1Client.model.Compte;
@Repository
public interface CompteRepository extends JpaRepository<Compte, Long>{
	
}
